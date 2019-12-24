function confirmDelete(href, something)
{
    if (confirm('Are you sure you want to delete this ' + something + '?')) {
       window.location.href = href; 
    }
    return false;
}

