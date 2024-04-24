
<input type="text" placeholder="animal">
<button></button>


<script>
fetchData();
async function fetchData(){
    
    const url = 'https://animals-by-api-ninjas.p.rapidapi.com/v1/animals?name=cheetah';
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
	console.log(result);
} catch (error) {
	console.error(error);
}
}




</script>

