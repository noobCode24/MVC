// Khám phá công viên

const container = document.querySelector('.container-park');
var w = container.offsetWidth;
const parkList = document.querySelector('.park-list');
const hover = document.querySelector('.park');
hover.addEventListener('mouseenter', function() {
    parkList.style.width = w + 'px';
    parkList.style.minWidth = w + 'px';
});


// show detail event

// const eventDetail = document.querySelector('.event-detail');
// const overlay = document.querySelector('.overlay');
// const event = document.querySelector('event');

function showDetail(e) {
    var overlay;
    if(e.nextElementSibling.classList.contains('overlay')) {
        overlay = e.nextElementSibling;
    }
    if(overlay != null) {
        overlay.style.display = 'block';
        var eventDetail = overlay.querySelector('.event-detail');
        eventDetail.style.display = 'flex';
        document.querySelector('html').style.overflow = 'hidden';
    }
}

function hideDetail(e) {

    var overlay = e.closest('.overlay');
    var eventDetail = overlay.querySelector('.event-detail');
    eventDetail.style.display = 'none';
    overlay.style.display = 'none';
    document.querySelector('html').style.overflowY = 'scroll';
}
