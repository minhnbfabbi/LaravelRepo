

// // Listen for any intercepted responses.
// window.intercepted.$on('response', data => {
//   // 
// });
 
// // Listen for any intercepted responses under the Client Error category (4xx).
// window.intercepted.$on('response:client-error', data => {
//   // 
// });
 
// // Listen for any intercepted responses under the Server Error category (5xx).
// window.intercepted.$on('response:5xx', data => {
//   // 
// });
 
// // Listen for a specific status.
// window.intercepted.$on('response:404', data => {
//   // 
// });
 
// // Listen for a specific HTTP code.
// window.intercepted.$on('response:unprocessable-entity', data => {
//   // 
// });
// 
var requestStart = function() {
	window.axios.interceptors.request.use(
		(config) => {
			// show loader, store instance
			console.log("Start");
			return config;
		}
	);
}
var requestFinish = function() {
	window.axios.interceptors.response.use(
		(response) => {
			console.log("End");
			// hide loader
			return response;
			
		}
	);
}
var response404 = function() {

}

var responseCommon = function() {
	// Listen for any intercepted responses.
	window.intercepted.$on('response', data => {

	});
}

var response = function() {
	requestStart();
	requestFinish();
	response404();
	responseCommon();
}

export default {
	response
}
