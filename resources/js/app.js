import './bootstrap';

import Alpine from 'alpinejs'
window.Alpine = Alpine

Alpine.start()

// flowbite js
import 'flowbite';

/** 
 * vite processed static files
 * The folder must be inside resources
 */
import.meta.glob([
 '../img/**',
 '../svgs/**',
]);
