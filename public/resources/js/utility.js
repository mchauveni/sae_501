const Pipe = async (url, method = null, body = null) => {
    try {
        const context = !body ? await fetch(url, { method: method ?? "GET" }) : await fetch(url, { method: method, headers: { 'Accept': 'application/json', 'Content-Type': 'application/json' }, body: JSON.stringify(body) });
        const response = await context.json(); return response;
    } catch (error) {
        console.error(error);
        return error;
    }
}

const $ = (el) => { return document.querySelector(el); }
const $$ = (els) => { return document.querySelectorAll(els); }

const Random = (min, max) => { return Math.floor(Math.random() * (max - min) + min); }