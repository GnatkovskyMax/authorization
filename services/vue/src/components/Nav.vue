<template>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <router-link to="/" class="navbar-brand" v-if="auth" >Home</router-link>
    <div v-if="!auth">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <router-link to="/login" class="navbar-brand" >Login</router-link>
        </li>
        <li class="nav-item active">
          <router-link to="/register" class="navbar-brand" >Register</router-link>
        </li>
      </ul>
    </div>
    <div  v-if="auth">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <span class="navbar-brand" style="cursor:pointer" v-on:click.stop.prevent="logout" >Logout</span>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Nav",
  computed: {
     auth() {
       return this.$store.getters.allAuth;
    }
  },
  self:this,
  methods: {
    logout: async() => {
      const requestOptions = {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        "Authorization": window.localStorage.getItem('Authorization')
      };
      fetch("http://localhost:8000/node/api/logout", requestOptions).then(function (result){
        result.text().then(function (text) {
          switch (result.status){
            case 200:
              window.localStorage.setItem('Authorization', '');
              window.localStorage.setItem('Refresh', '');
              self.$store.dispatch("fetchAuth");
              self.$router.push('/login');
              break;
            default:
              console.log('Error: '+text);
          }
        });
      });
    }
    }
    // return {
    //   logout,
    //   auth
    // }
}
</script>
