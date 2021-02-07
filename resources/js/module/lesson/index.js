import {createApp} from 'vue'
import App from "./App";
import VuePlyr from 'vue-plyr';
import routes from "./routes";

const app = createApp(App);

app.use(VuePlyr, {
    plyr: {
        captions: {active: false, language: 'auto', update: false},
        youtube: {noCookie: false, rel: 0, showinfo: 0, iv_load_policy: 0, modestbranding: 0}
    },
});


app.use(routes);

app.mount('#app');
