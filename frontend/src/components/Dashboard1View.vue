<template lang="">
    <div>
        <v-container>
           <h2>Lista de USers</h2>
           <ul>
                <li v-for="user in users" 
                :key="user.id"    
                > {{ user.firstName }}</li>
           </ul>

           <v-list-item> 

           </v-list-item>
        </v-container>
    </div>
</template>
<script>
import http from '@/services/http.js'

export default {
    data(){
        return {
            users:[],
        }
    },
    async mounted() {
        try {
            const {data} = await http.get('/users');
            this.users = data
        } catch (error) {
            console.log(error)
        }
    },
}
</script>
