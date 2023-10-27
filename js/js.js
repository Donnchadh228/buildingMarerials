let buttonClose = document.querySelector(".warehouse__close"),
	filterBlock = document.querySelector(".warehouse__setting"),
	warehouseFilter = document.querySelector(".warehouse_filter"),
	warehouseRow = document.querySelector(".warehouse__row")
buttonClose
	? (buttonClose.onclick = () => {
			buttonClose.classList.toggle("warehouse__open")
			filterBlock.classList.toggle("warehouse__setting-close")
			warehouseFilter.classList.toggle("warehouse_filter-close")
			warehouseRow.classList.toggle("filter-open")
	  })
	: ""

let agreementFull = document.querySelectorAll(".agreement__block")

function fullDescription() {
	let button = this.querySelector(".agreement__close")
	let arFull = this.querySelector(".agreement__full")
	function stopPr(e) {
		e.stopPropagation()
		e.cancelBubble = true
	}
	arFull.onclick = stopPr
	button.classList.toggle("agreement__open")
	this.classList.toggle("agreement__block-open")
}
agreementFull
	? agreementFull.forEach((element) => {
			element.onclick = fullDescription
	  })
	: ""
