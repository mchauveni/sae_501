const Calendar = {
    // FR Translation
    days: { "Mon": "Lundi", "Tue": "Mardi", "Wed": "Mercredi", "Thu": "Jeudi", "Fri": "Vendredi", "Sat": "Samedi", "Sun": "Dimanche" },
    months: {
        "Jan": "Janvier", "Feb": "Février", "Mar": "Mars", "Apr": "Avril", "May": "Mai", "Jun": "Juin", "Jul": "Juillet",
        "Aug": "Âout", "Sep": "Septembre", "Oct": "Octobre", "Nov": "Novembre", "Dec": "Décembre"
    },
    offset: 0,
    start: null,
    end: null,
    render: () => {
        Calendar.container = $('.js-calendar');
        if(Calendar.container) {
            Calendar.inputdefaultstart = $('#dateInscStart').value;
            Calendar.inputdefaultend = $('#dateInscEnd').value;

            console.log([Calendar.inputdefaultstart, Calendar.inputdefaultend]);
            Calendar.offset = new Date().getUTCMonth() - (new Date($('#dateInscStart').value)).getUTCMonth();
            Calendar.start = Calendar.defaultstart = ((new Date($('#dateInscStart').value)).getTime()/1000/60/60/24).toFixed(0);
            Calendar.end = Calendar.defaultend = ((new Date($('#dateInscEnd').value)).getTime()/1000/60/60/24).toFixed(0);

            Calendar.container.innerHTML = 
                `${Calendar.components.header()}
                    <div class="calendar_body">
                        ${Calendar.components.body()}
                    </div>`;
            Calendar.DOM = {
                containerForm: Calendar.container.closest("form"),
                calendarDate: $('.calendar_date'),
                calendarNavL: $('.calendar_nav.l'),
                calendarNavR: $('.calendar_nav.r'),
                calendarBody: $('.calendar_body'),
                inputDateStart: $('#dateInscStart'),
                inputDateEnd: $('#dateInscEnd')
            }
            Calendar.handleEvents();
        }
    },
    // ? -1 || 1
    swipe: (side) => {
        Calendar.offset += side;
        Calendar.DOM.calendarBody.innerHTML = Calendar.components.body();
    },
    handleEvents: () => {
        Calendar.DOM.calendarNavL.addEventListener('click', () => Calendar.swipe(1));
        Calendar.DOM.calendarNavR.addEventListener('click', () => Calendar.swipe(-1));
        Calendar.DOM.calendarBody.addEventListener('click', Calendar.handleSelection)
        Calendar.DOM.containerForm.addEventListener('reset', () => { 
            Calendar.start = Calendar.defaultstart; Calendar.end = Calendar.defaultend; 
            Calendar.DOM.inputDateStart.value = Calendar.inputdefaultstart; Calendar.DOM.inputDateEnd.value = Calendar.inputdefaultend;
            Calendar.DOM.calendarBody.innerHTML = Calendar.components.body();
        });
    },
    handleSelection: (evt) => {
        if(evt.target.classList.contains("calendar_cell")) {
            let target = evt.target;
            if(!Calendar.start) {
                Calendar.start = target.dataset.date;
                Calendar.DOM.inputDateStart.value = target.dataset.inputdate;
            } else {
                if(target.dataset.date === Calendar.start) {
                    Calendar.start = null;
                    Calendar.end = null;
                    Calendar.DOM.inputDateStart.value = null;
                    Calendar.DOM.inputDateEnd.value = null;
                } else if(target.dataset.date !== Calendar.start && target.dataset.date > Calendar.start) {
                    Calendar.end = target.dataset.date;
                    Calendar.DOM.inputDateEnd.value = target.dataset.inputdate;
                }
            }
            Calendar.DOM.calendarBody.innerHTML = Calendar.components.body();
        }
    },
    components: {
        header: () => {
            let date = new Date();
            date.setMonth(date.getMonth() - Calendar.offset);
            return `<div class="calendar_head">
                <i class="calendar_nav l">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </i>
                <div class="calendar_date">${Object.values(Calendar.months)[date.getMonth()]} ${date.getFullYear()}</div>
                <i class="calendar_nav r">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </i>
            </div>`;
        },
        body: () => {
            let calendar = new Date();
            let monthTime = calendar.getTime();
            calendar.setMonth(calendar.getMonth() - Calendar.offset);
            if(Calendar.DOM) Calendar.DOM.calendarDate.innerHTML = `${Object.values(Calendar.months)[calendar.getMonth()]} ${calendar.getFullYear()}`;
            let month = calendar.getMonth();
            let days = "";

            for (let i = 1; i < 33; i++) {
                calendar.setDate(i);
                if (calendar.getMonth() === month) {
                    let state = calendar.getTime() < monthTime ? "past" : calendar.getTime() == monthTime ? "today" : "futur";
                    let select_range = "";

                    let timestamp = (calendar.getTime()/1000/60/60/24).toFixed(0);

                    if(timestamp == Calendar.start) {
                        select_range = "start";
                    } else if (timestamp == Calendar.end) {
                        select_range = "end";
                    } else if (timestamp >= Calendar.start && timestamp <= Calendar.end) {
                        select_range = "ranged";
                    }

                    days += `<i class="calendar_cell ${state} ${select_range}" data-inputdate="${calendar.getFullYear()}-${calendar.getMonth() < 9 ? `0${calendar.getMonth()+1}` : calendar.getMonth()+1}-${calendar.getUTCDate()}" data-date="${timestamp}">${i}</i>`;
                }
            }
            return days;
        }
    }
}

document.addEventListener('DOMContentLoaded', Calendar.render)