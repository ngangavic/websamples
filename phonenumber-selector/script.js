var slider = document.getElementById("range");
var output = document.getElementById("result");
output.innerHTML = "0" + slider.value;


slider.oninput = function () {
    output.innerHTML = "0" + this.value;
    document.getElementById("call").href = "tel:" + "0" + this.value;
    document.getElementById("call").text = "Call 0" + this.value;
}