const apiURL = "https://psgc.gitlab.io/api/";
const citySelect = document.getElementById('city');
const barangaySelect = document.getElementById('barangay');
const citySelect1 = document.getElementById('city1');
const barangaySelect1 = document.getElementById('barangay1');

// PSCG API: Regions

fetch(apiURL + 'regions/').then(response => response.json()).then(data => {
          
      const regionsSelect = document.getElementById('region');
      data.sort((a, b) => a.name.localeCompare(b.name));
      data.forEach(region => {

        const option = document.createElement('option');
        option.value = region.code;
        option.textContent = region.name;
        regionsSelect.appendChild(option);
        
      });
});

// HIDDEN
fetch(apiURL + 'regions/')
.then(response => response.json())
.then(data => {
          
    const regionsSelect = document.getElementById('region1');
    data.sort((a, b) => a.name.localeCompare(b.name));
    data.forEach(region1 => {

      const option = document.createElement('option');
      option.value = region1.name;
      option.textContent = region1.name;
      regionsSelect.appendChild(option);
      
    });
});

// PSGC API: Provinces

async function fetch_provinces () {

    var region1 = document.getElementById('region');
    var region2 = document.getElementById('region1');

    region2.value = region1.options[region1.selectedIndex].text;

    const region = document.getElementById('region').value;

    if (region === "130000000")
    {  
        // '130000000' is the code for NCR
        // If NCR is selected, skip fetching provinces and directly fetch cities
        fetch_cities();
        document.querySelector(".province").style.display = "none";

        // Reset the select element
        citySelect.selectedIndex = -1;
        barangaySelect.selectedIndex = -1;

        // Clear the options
        citySelect.innerHTML = '';
        barangaySelect.innerHTML = '';
        
        return;
    }

    document.querySelector(".city").style.display = "none";
    document.querySelector(".barangay").style.display = "none";

    fetch(apiURL + 'regions/' + region + `/provinces/`).then(response => response.json()).then(data => {

        document.querySelector(".province").style.display = "block";
        
        const provincesSelect = document.getElementById('province');
        const buffer = document.createElement('option');

        // Add a title text
        buffer.value = "title";
        buffer.textContent = "-Select Province-";
        buffer.disabled = true;
        buffer.selected = true;

        provincesSelect.innerHTML = '';
        provincesSelect.appendChild(buffer);
        
        data.sort((a, b) => a.name.localeCompare(b.name));
        data.forEach(province => {
            const option = document.createElement('option');
            
            option.value = province.code;
            option.textContent = province.name;
            provincesSelect.appendChild(option);
        });
    });

    // HIDDEN

    const regions = document.getElementById('region1').value;

    if (regions === "130000000")
    {  
        // '130000000' is the code for NCR
        // If NCR is selected, skip fetching provinces and directly fetch cities
        fetch_cities();

        // Reset the select element
        citySelect1.selectedIndex = -1;
        barangaySelect1.selectedIndex = -1;

        // Clear the options
        citySelect1.innerHTML = '';
        barangaySelect1.innerHTML = '';
        
        return;
    }

    fetch(apiURL + 'regions/' + regions + `/provinces/`)
    .then(response => response.json())
    .then(data => {
        
        const provincesSelect = document.getElementById('province1');
        
        data.sort((a, b) => a.name.localeCompare(b.name));
        data.forEach(province1 => {
            const option = document.createElement('option');
            
            option.value = province1.name;
            option.textContent = province1.name;
            provincesSelect.appendChild(option);
        });
    });
}


// PSGC API: Cities

async function fetch_cities () {

    var province1 = document.getElementById('province');
    var province2 = document.getElementById('province1');

    province2.value = province1.options[province1.selectedIndex].text;

    const province = document.getElementById('province').value;
    const region = document.getElementById('region').value;

    let apiUrl;
    if (region === '130000000') 
    {
        // If the region is NCR, use the specific NCR API endpoint for cities
        apiUrl = apiURL + `regions/` + region + `/cities-municipalities/`;

        // Reset the select element
        barangaySelect.selectedIndex = -1;

        // Clear the options
        barangaySelect.innerHTML = '';
    } 
    // Otherwise, use the generic API endpoint for cities under provinces
    else 
    {
        apiUrl = apiURL + `provinces/` + province + `/cities-municipalities/`;
    }

    document.querySelector(".barangay").style.display = "none";

    fetch(apiUrl)
    .then(response => response.json())
    .then(data => {

        document.querySelector(".city").style.display = "block";
        
        const citiesSelect = document.getElementById('city');
        const buffer = document.createElement('option');

        buffer.value = "title";
        buffer.textContent = "-Select City/Municipal-";
        buffer.disabled = true;
        buffer.selected = true;

        citiesSelect.innerHTML = '';
        citiesSelect.appendChild(buffer);
          
        data.sort((a, b) => a.name.localeCompare(b.name));
        data.forEach(city => {
            const option = document.createElement('option');
            option.value = city.code;
            option.textContent = city.name;
            citiesSelect.appendChild(option);
        });
    });

    const provinces = document.getElementById('province1').value;
    const regions = document.getElementById('region1').value;
    // HIDDEN VALUES
    let apiUrl1;
    if (regions === '130000000') 
    {
        // If the region is NCR, use the specific NCR API endpoint for cities
        apiUrl1 = apiURL + `regions/` + regions + `/cities-municipalities/`;

        // Reset the select element
        barangaySelect1.selectedIndex = -1;

        // Clear the options
        barangaySelect1.innerHTML = '';
    } 
    // Otherwise, use the generic API endpoint for cities under provinces
    else 
    {
        apiUrl1 = apiURL + `provinces/` + provinces + `/cities-municipalities/`;
    }

    fetch(apiUrl1)
    .then(response => response.json())
    .then(data => {
        
        data.sort((a, b) => a.name.localeCompare(b.name));
        data.forEach(city1 => {
            const option = document.createElement('option');
            option.value = city1.name;
            option.textContent = city1.name;
            citySelect1.appendChild(option);
        });
    });
}

// PSGC API: Barangays

async function fetch_barangays () {

    const city = document.getElementById('city').value;

    fetch(`https://psgc.gitlab.io/api/cities-municipalities/` + city + `/barangays/`).then(response => response.json()).then(data => {

        document.querySelector(".barangay").style.display = "block";

        const barangaysSelect = document.getElementById('barangay');
        const buffer = document.createElement('option');

        buffer.value = "title";
        buffer.textContent = "-Select Barangay-";
        buffer.disabled = true;
        buffer.selected = true;

        barangaysSelect.innerHTML = '';
        barangaysSelect.appendChild(buffer);
          
        data.sort((a, b) => a.name.localeCompare(b.name));
        data.forEach(barangay => {
            const option = document.createElement('option');
            option.value = barangay.code;
            option.textContent = barangay.name;
            barangaysSelect.appendChild(option);
        });
    });

}

/*
// PSCG API: Regions

            fetch(`https://psgc.gitlab.io/api/regions/`)
            .then(response => response.json())
            .then(data => {
                        
                const regionsSelect = document.getElementById('region');
                data.sort((a, b) => a.name.localeCompare(b.name));
                data.forEach(region => {
                    const option = document.createElement('option');
                    option.value = region.code;
                    option.textContent = region.name;
                    regionsSelect.appendChild(option);
                });
            });

            // PSCG API: Regions

            fetch(`https://psgc.gitlab.io/api/regions/`)
            .then(response => response.json())
            .then(data => {
                        
                const regionsSelect = document.getElementById('region1');
                data.sort((a, b) => a.name.localeCompare(b.name));
                data.forEach(region => {
                    const option = document.createElement('option');
                    option.value = region.name;
                    option.textContent = region.name;
                    regionsSelect.appendChild(option);
                });
            });

            // PSGC API: Provinces

            async function fetch_provinces () {

                var reg1 = document.getElementById('region');
                var reg2 = document.getElementById('region1');

                reg2.value = reg1.options[reg1.selectedIndex].text;

                const region = document.getElementById('region').value;

                fetch(`https://psgc.gitlab.io/api/regions/` + region + `/provinces/`)
                .then(response => response.json())
                .then(data => {

                    const provincesSelect = document.getElementById('province');
                    const buffer = document.createElement('option');

                    provincesSelect.innerHTML = '';
                    provincesSelect.appendChild(buffer);
                    
                    data.sort((a, b) => a.name.localeCompare(b.name));
                    data.forEach(province => {
                        const option = document.createElement('option');
                        option.value = province.code;
                        option.textContent = province.name;
                        provincesSelect.appendChild(option);
                    });
                });

                fetch(`https://psgc.gitlab.io/api/regions/` + region + `/provinces/`)
                .then(response => response.json())
                .then(data => {
                        
                    const provinceSelect = document.getElementById('province1');
                    data.sort((a, b) => a.name.localeCompare(b.name));
                    data.forEach(province1 => {
                        const option = document.createElement('option');
                        option.value = province1.name;
                        option.textContent = province1.name;
                        provinceSelect.appendChild(option);
                    });
                });


            }


            // PSGC API: Cities
            
            async function fetch_cities () {

                var prov1 = document.getElementById('province');
                var prov2 = document.getElementById('province1');

                prov2.value = prov1.options[prov1.selectedIndex].text;

                const province = document.getElementById('province').value;

                fetch(`https://psgc.gitlab.io/api/provinces/` + province + `/cities-municipalities/`)
                .then(response => response.json())
                .then(data => {

                    const citiesSelect = document.getElementById('city');
                    const buffer = document.createElement('option');

                    citiesSelect.innerHTML = '';
                    citiesSelect.appendChild(buffer);
                    
                    data.sort((a, b) => a.name.localeCompare(b.name));
                    data.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.code;
                        option.textContent = city.name;
                        citiesSelect.appendChild(option);
                    });
                });
				fetch(`https://psgc.gitlab.io/api/provinces/` + province + `/cities-municipalities/`)
                .then(response => response.json())
                .then(data => {
                        
                    const citySelect = document.getElementById('city1');
                    data.sort((a, b) => a.name.localeCompare(b.name));
                    data.forEach(city1 => {
                        const option = document.createElement('option');
                        option.value = city1.name;
                        option.textContent = city1.name;
                        citySelect.appendChild(option);
                    });
                });
            }


            // PSGC API: Barangays

            async function fetch_barangays () {

				var city1 = document.getElementById('city');
                var city2 = document.getElementById('city1');

                city2.value = city1.options[city1.selectedIndex].text;

                const city = document.getElementById('city').value;

                fetch(`https://psgc.gitlab.io/api/cities-municipalities/` + city + `/barangays/`)
                .then(response => response.json())
                .then(data => {

                    const barangaysSelect = document.getElementById('barangay');
                    const buffer = document.createElement('option');

                    barangaysSelect.innerHTML = '';
                    barangaysSelect.appendChild(buffer);
                    
                    data.sort((a, b) => a.name.localeCompare(b.name));
                    data.forEach(barangay => {
                        const option = document.createElement('option');
                        option.value = barangay.code;
                        option.textContent = barangay.name;
                        barangaysSelect.appendChild(option);
                    });
                });
            }
*/