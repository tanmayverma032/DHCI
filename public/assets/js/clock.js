
const clock12 = document.getElementById('clock12')
function concatZero(timeFrame) {
return timeFrame < 10 ? '0'.concat(timeFrame) : timeFrame
}

function realTime() {
let date = new Date()
let sec = date.getSeconds()
let mon = date.getMinutes()
let hr = date.getHours()
clock12.textContent = `${concatZero((hr % 12) || 12)} : ${concatZero(mon)} : ${concatZero(sec)} ${hr >= 12 ? 'PM' : 'AM'}`

}
setInterval(realTime, 1000)
                  