import './bootstrap';

import { createApp } from 'vue';
import FollowButton from "./components/FollowButton.vue";

const app = createApp({});

app.component('FollowButton', FollowButton);

app.mount("#app");

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
