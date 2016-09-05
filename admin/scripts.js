function createPage()
{
var pageName = window.prompt("Please type in a filename for the page. Only use letters, numbers, dashes and underscores. No spaces.","");

if (pageName != null)
  {
  window.location='index.php?createPage=' + pageName;
  }
}


function deletePage(whichPage)
{
var confirmDelete = window.confirm("Sure you want to delete page?");

if (confirmDelete == true)
  {
  window.location='index.php?deletePage=' + whichPage;
  }
}


function expandEditor()
{
document.getElementById("editorArea").style.height = "5px";
document.getElementById("editorArea").style.height = (document.getElementById("editorArea").scrollHeight + 20)+"px";
}


// Upload File

function uploadFile()
{
var openFileDialog = document.all.fileToUpload.click();
}


// Create Folder

function createFolder()
{
var createFolderDialog = window.prompt("Name the folder to be created:");

if (createFolderDialog != null)
  {
  document.all.newFolder.value = createFolderDialog;
  document.all.createFolderForm.submit();
  }
}


// Confirm Navigate

function confirmNavigate(url,question)
{
if (window.confirm(question) == true)
  {
  window.location=url;
  }
}

// Toggle sidebar

function toggleSidebar()
{
if (document.getElementById("cmsSidebar").style.left == "-251px")
  {
  document.getElementById("cmsSidebar").style.left = "0px";
  }
else
  {
  document.getElementById("cmsSidebar").style.left = "-251px";
  }
}