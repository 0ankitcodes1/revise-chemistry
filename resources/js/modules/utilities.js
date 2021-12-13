function $(dom) {
    return document.querySelector(dom);
}
function $$(dom) {
    return document.querySelectorAll(dom);
}
function create(dom) {
    return document.createElement(dom);
}

module.exports = { $, $$, create }