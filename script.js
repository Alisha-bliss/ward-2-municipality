document.getElementById('service').addEventListener('change', function() {
  const extra = document.getElementById('extraFields');
  extra.innerHTML = '';

  if (this.value === 'Marriage Registration') {
    extra.innerHTML = `
      <div class="form-group">
        <label>Spouse Name:</label>
        <input type="text" name="spouseName" required>
      </div>
      <div class="form-group">
        <label>Date of Marriage:</label>
        <input type="date" name="dateOfMarriage" required>
      </div>`;
  } else if (this.value === 'Death Registration') {
    extra.innerHTML = `
      <div class="form-group">
        <label>Deceased Name:</label>
        <input type="text" name="deceasedName" required>
      </div>
      <div class="form-group">
        <label>Date of Death:</label>
        <input type="date" name="dateOfDeath" required>
      </div>`;
  } else if (this.value === 'Migration Registration') {
    extra.innerHTML = `
      <div class="form-group">
        <label>From Address:</label>
        <input type="text" name="fromAddress" required>
      </div>
      <div class="form-group">
        <label>To Address:</label>
        <input type="text" name="toAddress" required>
      </div>`;
  } else if (this.value === 'Senior Citizen ID') {
    extra.innerHTML = `
      <div class="form-group">
        <label>Date of Birth:</label>
        <input type="date" name="dob" required>
      </div>`;
  }
});
