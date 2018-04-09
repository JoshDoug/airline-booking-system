var $imgs = $(".image-container").find("img"),
    i = 0;

function changeImage(){
    var next = (++i % $imgs.length);
    $($imgs.get(next - 1)).fadeOut(480);
    $($imgs.get(next)).delay(500).fadeIn(500);
}
var interval = setInterval(changeImage, 2000);