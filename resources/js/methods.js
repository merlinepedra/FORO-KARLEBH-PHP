export default {

  editAction(event) {
    localStorage.setItem('post', JSON.stringify(event.target.dataset.post))
    this.changeTitle = true
  },

  openReplyBox($event){
    $event.target.parentNode.nextElementSibling.classList.contains('hidden') 
    ? $event.target.parentNode.nextElementSibling.classList.replace('hidden', 'block')
    : $event.target.parentNode.nextElementSibling.classList.replace('block', 'hidden')
  },

  toggleAdminMobileMenu() {
    document.getElementById('adminMobileNav').classList.toggle('hidden')
  },


  reply($event) {

    const parentId = $event.target.getAttribute('data-parent-id')
    const sendBtn = document.getElementById('sendBtn')
    const textarea = document.getElementById('textarea')

    const parentIdTag = document.createElement('input')
    parentIdTag.type = 'hidden'
    parentIdTag.name = 'parent_id'
    parentIdTag.id = 'parent_id'
    parentIdTag.value = parentId

    document.getElementById('commentBox').append(parentIdTag)
    
    sendBtn.value = "Send Reply"
    sendBtn.classList.replace('bg-blue-900', 'bg-green-600')

    textarea.placeholder = "Replies here..."

    console.log(document.getElementById('commentBox'))


  }
}