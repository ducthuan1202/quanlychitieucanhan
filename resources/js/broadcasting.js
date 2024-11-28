export function sendPrivateChannel(payload, successCallback, errorCallback) {

  axios.post('/api/webhooks/channel/private', payload)
    .then((response) => successCallback(response.data))
    .catch((error) => errorCallback(error));
}