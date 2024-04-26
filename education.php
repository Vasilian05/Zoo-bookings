
<?php include_once 'includes/header.php'; ?>
    <input type="text" id="getAnimal" placeholder="animal">
    <button onclick="fetchData()"></button>
    <div id='name'></div>

    <div class="loading">

    
</div>

<div class="container">
    
</div>

<script>

async function fetchData(){
    
    let animal = document.getElementById('getAnimal').value.toLowerCase();
    const url = `https://animals-by-api-ninjas.p.rapidapi.com/v1/animals?name=${animal}`;
const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': 'fc61460869mshc25d1ced8913b2ep14c9cdjsn1025caee0617',
		'X-RapidAPI-Host': 'animals-by-api-ninjas.p.rapidapi.com'
	}
};

try {
    document.querySelector('.loading').innerHTML = `</div>
    <div class="d-flex justify-content-center">
    <div class="spinner-border" role="status">
  </div>`
	const response = await fetch(url, options);
	const result = await response.text();
	var data = JSON.parse(result);
    displayAnimal(data);
    

} catch (error) {
	console.error(error);
}
}

function displayAnimal(data){

    

    
    for(let i = 0; i<data.length - 1; i++){

        document.querySelector(`.container`).innerHTML += `
                <div class="pokemonField">
                <p>${data[i].name}</p>
               
            </div>
            
            `
            console.log(i)
    }
 
    document.querySelector('.spinner-border').remove();
}



</script>

<?php include_once 'includes/footer.php'; ?>
