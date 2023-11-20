async function test () {
    const response = await fetch("http://127.0.0.1:8000/review");
    const data = await response.json();
    console.log(data);
    const testP = document.getElementById('test').textContent = data[0].name + " " + data[0].email;
}

test();