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

const selection = {
  city: () => document.getElementById('selectCity').value,
  range: () => Array.from(document.getElementsByName('range'))
    .filter(range => range.checked)
    .map(range => range.value)
}

const retrieveInformation = () => {
  const url = `retrieveHotelInfo.php?city=${selection.city()}&type=${selection.range()}`
  get(url, data => {
    const hotels = data.sort(function (a, b) {
      return (a.Price > b.Price) ? 1 :
        ((b.Price > a.Price) ? -1 : 0)
    })

    // Append hotel
    const informationSection = document.getElementById('information')
    informationSection.innerHTML = ''
    hotels.forEach(hotel => {
      informationSection.innerHTML += `<p>Hotel: ${hotel.Name}<br/>Price: ${hotel.Price}</p>`
    })
  })
}

(function () {
  // Populate cities list
  get('retrieveHotelInfo.php', cities => {
    cities.map(city => {
      document.getElementById('selectCity').appendChild(
        new Option(city, city)
      )
    })
    // Default
    retrieveInformation()
  })

  // Set input listener
  document.getElementById('selectCity').onchange = retrieveInformation
  Array.from(document.getElementsByName('range')).map(range => {
    range.onchange = retrieveInformation
  })
})()
