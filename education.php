

    <input type="text" id="getAnimal" placeholder="animal">
    <button onclick="fetchData()"></button>
    <div id='name'></div>


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
	const response = await fetch(url, options);
	const result = await response.text();
	var data = JSON.parse(result);
    console.log(data[0]);
    displayAnimal(data);

} catch (error) {
	console.error(error);
}
}

function displayAnimal(data){
    document.querySelector(".container").innerHTML = `
            <div class="pokemonField">
            <p>${data[1].name}</p>
           
        </div>
        
        `

}



</script>

