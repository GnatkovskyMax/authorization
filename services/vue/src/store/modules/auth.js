
export default {
    actions: {
        async fetchAuth(ctx){
            const auth = Boolean( window.localStorage.getItem('Authorization') && window.localStorage.getItem('Refresh') )
            ctx.commit('updateAuth',auth)
        }
    },
    mutations: {
        updateAuth(state, auth){
            state.auth = auth
        }
    },
    state: {
        auth: Boolean( window.localStorage.getItem('Authorization') && window.localStorage.getItem('Refresh') )
    },
    getters: {
        allAuth(state){
          return state.auth;
        }
    },
}
