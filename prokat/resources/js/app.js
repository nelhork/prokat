import './bootstrap';
import {createApp} from 'vue';
import ModelSelector from './components/ModelSelector.vue';

const app = createApp({});
app.component('ModelSelector', ModelSelector);
app.mount('#app');
