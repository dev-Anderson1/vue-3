<template>
    <div>
        <input type="email" v-model="email" placeholder="email">
        <br />
        <br />
        <input type="password" v-model="password" placeholder="senha">
        <br />
        <br />
        <button @click="submit">Logar</button>
    </div>
</template>
<script>
export default {
    data(){
        return {
            email:"",
            password:"",
        }
    },
    methods:{
        submit(){
            var data = {
                email:this.email, 
                password: this.password
            }
                console.log(data)
                this.http.post('/login', data).then((response) => {
                    console.log(response)
                    localStorage.setItem('token', response.data.access_token)
                })
                .catch((error) => {
                    console.log(error.response.data)
                })
           
          
        },
    }
}
</script>
<style lang="">
    
</style>