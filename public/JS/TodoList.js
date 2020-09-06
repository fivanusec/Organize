function disable()
{
    document.getElementsByClassName('check-box-item disable').disabled = true;
    let text = document.getElementsByClassName('text');
    text.classList.add(" disable");
}