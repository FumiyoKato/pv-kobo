import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.formatNumber = function(number) { // formatNumber に統一
    if (isNaN(number) || number === "" || number === null) {
        return "";
    }
    try {
        return Number(number).toLocaleString('ja-JP');
    } catch (error) {
        console.error("toLocaleString error:", error);
        return "";
    }
};