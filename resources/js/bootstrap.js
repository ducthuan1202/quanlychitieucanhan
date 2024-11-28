// window._ = require('lodash');
window.$ = require('jquery');

try {
    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

const axios = require('axios');
const axiosInstance = axios.create({
    timeout: 5000,
    headers: {
      'Authorization': 'Bearer 0WAtoFMOSVJC7Chad1D1GpbNk5SDPY1gW6HAYGRC',
      'X-Requested-With': 'XMLHttpRequest'
    }
  });

window.axios = axiosInstance;

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});
