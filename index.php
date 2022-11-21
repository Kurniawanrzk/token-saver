<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Token Application</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="style.css" rel="stylesheet" >
</head>
<body>
	<div class="container">
		<div class="wrapper-list">
			<div class="ipt-token">
				<div class="form-group">
					<input type="text" placeholder="input the token" id="ipt-token" />
					<button id="submit-ipt">Submit</button>
				</div>
			</div>
			<div class="list-token">
				<ul class="list">
				</ul>
			</div>
		</div>
	</div>
<script>
		window.addEventListener("load", () => {
			if(!localStorage.getItem("data")) {				
				localStorage.setItem("data", JSON.stringify([{data:"Hi, Have A Nice Day :)"}]))
			}
			JSON.parse(localStorage.getItem("data")).forEach((el, idx) => {
				document.querySelector(".list").innerHTML += `
					<li>${el.data} <button onClick=deleteData`+ `(${idx})` +`>Delete</button> </li>
				`
			})
			
		})
		document.getElementById("submit-ipt")
			.addEventListener("click", () => {
		if( document.getElementById("ipt-token").value !== "") {
			let dataListToken = JSON.parse(localStorage.getItem("data"));
			let d = new Date();
			dataListToken.push({data:document.getElementById("ipt-token").value, createdAt:Date()})
			localStorage.setItem("data", JSON.stringify(dataListToken))
			document.getElementById("ipt-token").value = ""
			window.location.reload()
		}
	})
	function deleteData(idx) {
		let dataListToken = JSON.parse(localStorage.getItem("data"));
		dataListToken.splice(idx,1)
		localStorage.setItem("data", JSON.stringify(dataListToken))
		window.location.reload()
	}
</script>
</body>
</html>
