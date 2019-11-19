<style scoped>
    .action-link {
        cursor: pointer;
    }
</style>

<template>
    <div>
        <div>
            <div class="card mb-3 card-body shadow-sm border-0">
                <h6 class="border-bottom border-gray pb-1 mb-3">
                    <i class="fe fe-plus text-muted mr-1"></i> Oauth API token toevoegen
                </h6>

                <div class="alert alert-danger" v-if="form.errors.length > 0">
                    <p class="mb-0"><strong>Whoops!</strong> Something went wrong!</p>
                    <br>
                    <ul>
                        <li v-for="error in form.errors">
                            {{ error }}
                        </li>
                    </ul>
                </div>

                <!-- Create Token Form -->
                <form role="form" @submit.prevent="store">
                    <!-- Name -->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Naam</label>

                        <div class="col-md-10">
                            <input id="create-token-name" type="text" class="form-control" name="name" v-model="form.name">
                        </div>
                    </div>

                    <!-- Scopes -->
                    <div class="form-group mb-1 row" v-if="scopes.length > 0">
                        <label class="col-md-2 col-form-label">Scopes</label>

                        <div class="col-md-2" v-for="scope in scopes">
                            <div>
                                <div class="checkbox">
                                    <label>
                                        <input class="mr-1" type="checkbox" @click="toggleScope(scope.id)" :checked="scopeIsAssigned(scope.id)">
                                        {{ scope.id }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-0 row">
                        <div class="offset-2 col-10">
                            <button type="button" class="btn btn-secondary" @click="store">
                                <i class="fe fe-plus"></i> Toevoegen
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="border-bottom border-gray pb-1 mb-3">
                        <i class="fe fe-terminal text-muted mr-1"></i> Oauth API tokens
                    </h6>

                    <!-- No Tokens Notice -->
                    <div class="alert border-0 mb-0 alert-info alert-important" v-if="tokens.length === 0">
                        <i class="fe fe-info mr-2"></i>
                        Je hebt momenteel nog geen API tokens geregistreerd.
                    </div>

                    <!-- Personal Access Tokens -->
                    <table class="table table-hover table-sm mb-0" v-if="tokens.length > 0">
                        <thead>
                            <tr>
                                <th class="border-top-0" scope="col">Name</th>
                                <th class="border-top-0" scope="col">Oauth token ID</th>
                                <th class="border-top-0" scope="col">&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="token in tokens">
                                <!-- Client Name -->
                                <td style="vertical-align: middle;">{{ token.name }}</td>
                                <td><code>{{ token.id.substring(0, 20) }}...</code></td>
                                <td style="vertical-align: middle;">{{ token.created_at }}</td>

                                <!-- Delete Button -->
                                <td>
                                    <span class="float-right">
                                        <a class="action-link text-danger" @click="revoke(token)">
                                            <i class="fe fe-trash-2 mr-1"></i> <small>Delete</small>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Access Token Modal -->
        <div class="modal fade" id="modal-access-token" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-card-footer border-bottom-0">
                        <h5 class="token-model-title modal-title">
                            Personal Access Token
                        </h5>
                    </div>

                    <div class="modal-body">
                        <p>
                            Here is your new personal access token. This is the only time it will be shown so don't lose it!
                            You may now use this token to make API requests.
                        </p>

                        <textarea class="form-control" rows="10">{{ accessToken }}</textarea>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer border-top-0 bg-card-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                accessToken: null,

                tokens: [],
                scopes: [],

                form: {
                    name: '',
                    scopes: [],
                    errors: []
                }
            };
        },

        /**
         * Prepare the component (Vue 1.x).
         */
        ready() {
            this.prepareComponent();
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
                this.getTokens();
                this.getScopes();

                $('#modal-create-token').on('shown.bs.modal', () => {
                    $('#create-token-name').focus();
                });
            },

            /**
             * Get all of the personal access tokens for the user.
             */
            getTokens() {
                axios.get('/oauth/personal-access-tokens')
                        .then(response => {
                            this.tokens = response.data;
                        });
            },

            /**
             * Get all of the available scopes.
             */
            getScopes() {
                axios.get('/oauth/scopes')
                        .then(response => {
                            this.scopes = response.data;
                        });
            },

            /**
             * Show the form for creating new tokens.
             */
            showCreateTokenForm() {
                $('#modal-create-token').modal('show');
            },

            /**
             * Create a new personal access token.
             */
            store() {
                this.accessToken = null;

                this.form.errors = [];

                axios.post('/oauth/personal-access-tokens', this.form)
                        .then(response => {
                            this.form.name = '';
                            this.form.scopes = [];
                            this.form.errors = [];

                            this.tokens.push(response.data.token);

                            this.showAccessToken(response.data.accessToken);
                        })
                        .catch(error => {
                            if (typeof error.response.data === 'object') {
                                this.form.errors = _.flatten(_.toArray(error.response.data.errors));
                            } else {
                                this.form.errors = ['Something went wrong. Please try again.'];
                            }
                        });
            },

            /**
             * Toggle the given scope in the list of assigned scopes.
             */
            toggleScope(scope) {
                if (this.scopeIsAssigned(scope)) {
                    this.form.scopes = _.reject(this.form.scopes, s => s == scope);
                } else {
                    this.form.scopes.push(scope);
                }
            },

            /**
             * Determine if the given scope has been assigned to the token.
             */
            scopeIsAssigned(scope) {
                return _.indexOf(this.form.scopes, scope) >= 0;
            },

            /**
             * Show the given access token to the user.
             */
            showAccessToken(accessToken) {
                $('#modal-create-token').modal('hide');

                this.accessToken = accessToken;

                $('#modal-access-token').modal('show');
            },

            /**
             * Revoke the given token.
             */
            revoke(token) {
                axios.delete('/oauth/personal-access-tokens/' + token.id)
                        .then(response => {
                            this.getTokens();
                        });
            }
        }
    }
</script>
