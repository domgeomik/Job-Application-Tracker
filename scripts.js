function showSection(sectionId) {
    // Hide all sections
    document.querySelectorAll('.content-section').forEach(section => section.style.display = 'none');
    
    // Show the selected section
    document.getElementById(sectionId).style.display = 'block';
}

function filterJobsByStatus() {
    const status = document.getElementById("statusFilter").value;
    
    fetch(`filter_jobs.php?status=${status}`)
        .then(response => response.json())
        .then(data => {
            const filteredJobs = document.getElementById('filteredJobs');
            filteredJobs.innerHTML = '';

            if (data.length === 0) {
                filteredJobs.innerHTML = '<p>No jobs found</p>';
            } else {
                data.forEach(job => {
                    const jobElement = document.createElement('div');
                    jobElement.innerHTML = `<p><strong>${job.company_name}</strong> - ${job.job_title} (${job.application_status})</p>`;
                    filteredJobs.appendChild(jobElement);
                });
            }
        });
}

