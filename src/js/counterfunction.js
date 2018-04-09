function modify_qty(val) {
    var qty = document.getElementById('qty').value;
    var new_qty = parseInt(qty,10) + val;
    
    if (new_qty < 0) {
        new_qty = 0;
    }
    
    document.getElementById('qty').value = new_qty;
    return new_qty;
}

/*
<div class="counter">
<label for="qty"><abbr title="Adults">Adults</abbr></label>
<input id="qty" value="0" />
<button id="down" onclick="modify_qty(-1)">-1</button>
<button id="up" onclick="modify_qty(1)">+1</button>
</div>
 */