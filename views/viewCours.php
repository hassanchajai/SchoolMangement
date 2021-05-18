<div class=" mb-4">
  <h1 class="font-weight-bold">
    List of Cours
  </h1>
</div>
<div class="card w-100">
  <div class="card-body ">
    <form class="d-flex justify-content-between">
      <select class="form-control" id="salle" name="idsalle">
        <option value="0" disabled selected>
          Choose Salle
        </option>
        <?php foreach ($salles as $key => $salle) : ?>
          <option value="<?= $salle->getId() ?>"><?= $salle->getLibelle() ?></option>
        <?php endforeach; ?>
      </select>
      <input type="date" name="date" id="date" disabled class="form-control">

      <select name="dt" disabled id="horraire" class="form-control mr-2">
        <option value="0" disabled selected>
          Choose date
        </option>

      </select>

      <button type="Button" class="btn btn-info" id="reserve" disabled>
        Submit
      </button>
    </form>
  </div>
</div>
<div class="data">
  <table class="table caption-top">
    <caption>Courses availble</caption>
    <thead>
      <tr>
        <th scope="col">Date</th>
        <th scope="col">hour</th>
        <th scope="col">Salle</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody id="body">

    </tbody>
  </table>
</div>


<!-- modal -->
<script>
  // get value of input
  const datecours = document.querySelector("#date");
  const idsalle = document.querySelector("#salle");
  const horraire = document.querySelector("#horraire");
  const btn = document.querySelector("#reserve");
  const bodytable = document.querySelector("tbody");

  const idens = <?= $idens ?>;
  const initialize = () => {
    document.querySelector("form").initialize();
  };
  const fetchAllCours = async () => {

    let body = JSON.stringify({
      idens
    });
    let template = ``;
    await fetch('/schoolmanagement/cours&status=cours', {
        method: 'POST',
        body,
        headers: {
          'Content-Type': 'application/json'
        }
      })
      .then(res => res.json())
      .then(res => {

        template = ``;
        res.cours.map(cour => {
          template += `
          <tr>
          <td> 
          ${cour.date}
          </td>
          <td> 
       <span class="badge bg-secondary">   ${cour.hor}</span>
          </td>
          <td> 
          ${cour.Salle}
          </td>
          <td> 
            <a class="btn btn-danger" href="cours&status=delete&id=${cour.id}">Delete </a>
          </td>
          
          </tr>
          `;
        });
      });
    bodytable.innerHTML = template;
  };
  fetchAllCours();
  idsalle.addEventListener("change", () => {
    if (idsalle.value !== 0) {
      datecours.removeAttribute("disabled");
    }
  });

  // trigger a event when change in datetime fill the inputs
  datecours.addEventListener("change", e => {
    e.preventDefault();
    let date = datecours.value;
    let horraries = [];
    // prepare form data
    let body = JSON.stringify({
      dt: date,
      idSalle: idsalle.value
    });
    // send request
    fetch('/schoolmanagement/cours&status=dates', {
        method: 'POST',
        body,
        headers: {
          'Content-Type': 'application/json'
        }
      })
      .then(res => res.json())
      .then(res => {
        // get horraires
        horraries = res.data;
        horraire.innerHTML = `
        <option value="0" disabled selected>
          Choose date
        </option>
        `;
        horraries.map(item => {
          horraire.innerHTML += `
          <option value="${item}" >
          ${item}
        </option>
          `;
        })
      })
      .catch(err => console.error(err));
    horraire.removeAttribute("disabled");
  });
  horraire.addEventListener("input", () => {
    btn.removeAttribute("disabled");
  });
  btn.addEventListener("click", () => {

    let date = datecours.value;
    // prepare form data
    let body = JSON.stringify({
      dt: date,
      idSalle: idsalle.value,
      idens,
      hor: horraire.value
    });
    // send request
    fetch('/schoolmanagement/cours&status=store', {
        method: 'POST',
        body,
        headers: {
          'Content-Type': 'application/json'
        }
      })
      .then(res => res.json())
      .then(res => {
        // datecours[0].setAttribute("selected");
        datecours.setAttribute("disabled", "");
        horraire.setAttribute("disabled", "");
        btn.setAttribute("disabled", "");
        fetchAllCours();
      });
  });
  // end of  send request to add cours
</script>