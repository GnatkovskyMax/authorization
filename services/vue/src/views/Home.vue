<template>
  <div>
    <main role="main" class="container text-center">
      <div v-html="message" class="starter-template text-center"></div>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
    </main>
  </div>
</template>

<script>
export default {
  name: "Home",
  data(){
    return {
      message:'<div class="spinner-border text-warning" role="status"><span class="visually-hidden"></span>',
    }
  },
  mounted: function (){
    const context = async() => {

      const requestOptions = {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "Authorization": window.localStorage.getItem('Authorization')
          }
        };
        self =this;
        const response = fetch("http://localhost:8000/node/api/user", requestOptions).then(function (result) {
          result.text().then(function (text) {
            switch (result.status) {
              case 200:
                self.message = "<h1>Hi "+JSON.parse(text).userdata.name+" !</h1>"
                break;
              case 401:
                const requestOptions = {
                  method: "POST",
                  headers: {
                    "Content-Type": "application/json",
                    "Refresh": window.localStorage.getItem('Refresh')
                  }
                };
                const refresh = fetch("http://localhost:8000/node/api/refresh", requestOptions).then(function (result) {
                  result.text().then(function (text) {
                    switch (result.status) {
                      case 200:
                        self.message = "<h1>Hi "+JSON.parse(text).userdata.name+" !</h1>"
                        window.localStorage.setItem('Authorization', result.headers.get("Authorization"));
                        window.localStorage.setItem('Refresh', result.headers.get("Refresh"));
                        break;
                      case 401:
                        window.localStorage.setItem('Authorization', '');
                        window.localStorage.setItem('Refresh', '')

                        self.$router.push('/login');
                        break;
                      case 400:
                        indow.localStorage.setItem('Authorization', '');
                        window.localStorage.setItem('Refresh', '');
                        self.$router.push('/login');
                        break;
                    }
                  });
                });
                break;
              default:
                console.log('Error: ' + text);
            }
          });
        });
    };
    context();
  }
}
</script>
