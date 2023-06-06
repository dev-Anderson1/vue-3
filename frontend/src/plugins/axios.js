import axios from 'axios';
import vue from 'vue'
 axios.defaults.baseURL = 'http://localhost:8000/api/';
 axios.defaults.headers.common['Authorization'] = `bearer ${localStorage.getItem('token')}`

 Vue.use({
    install(vue){
        vue.prototype.$http = axios
    }
 })

