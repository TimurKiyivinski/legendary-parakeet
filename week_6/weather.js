const get = (url, callback) => {
  const xmlhttp = new XMLHttpRequest()

  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == XMLHttpRequest.DONE) {
      if (xmlhttp.status == 200) {
        console.log(xmlhttp.responseText)
        callback(JSON.parse(xmlhttp.responseText))
      }
    }
  }
  xmlhttp.open('GET', url)
  xmlhttp.send()
}

(function() {
  document.getElementById('weather').onclick = () => {
    get('weather.php', data => {
      const total = data.reduce((a, b) =>
        parseFloat(a) + parseFloat(b.temperature), 0)
      const average = total / data.length

      // Update DOM
      const output = document.getElementById('output')
      output.innerHTML = ''
      data.forEach(date => {
        output.innerHTML += `<p>${date.day}/${date.month}/${date.year} : ${date.temperature}</p>`
      })
      output.innerHTML += `<p>Average temperature is: ${average}</p>`
    })
  }
})()
