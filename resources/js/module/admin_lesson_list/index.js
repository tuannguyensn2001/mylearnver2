import {createApp} from 'vue'
import App from "./App";
import axios from 'axios'

axios.defaults.baseURL = "http://mylearn.com"

const app = createApp(App);

app.mount('#app');
