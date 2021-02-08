import {createApp} from 'vue'
import App from "./App";
import axios from 'axios'
import config from "../../config";

axios.defaults.baseURL = config.baseURL;
const app = createApp(App);

app.mount('#app');
