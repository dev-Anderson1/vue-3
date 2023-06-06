<template>
  <div id="app">
    <div id="nav">

    </div>
    <router-view />
  </div>
</template>
<script>
export default {
  data(){
    return{

    }
  },
methods:{
  validate(){
    this.http.get('me').then((response) =>{
      console.log(response)
      if(response.data.status =='Token is Invalid'){
        this.$router.push('/login')
      }
    })
  }
},
created() {
  var list = ['about']
  if(!list.includes(localStorage.getItem('route'))){
    this.validate()
  }
 
},

}
</script>
<style>
  
</style>