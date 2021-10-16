/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import './scss/app.scss';
// any CSS you import will output into a single css file (app.css in this case)
// import './styles/app.css';
//import greenSock
import './js/gsap';
import 'htmx.org';
require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');

var app = {
     init: function () {
 
         console.log('made with 💖 and little 🍺')

         },
    }
$(app.init);