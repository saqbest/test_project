<div id="upload-wrapper">
    <div align="center">
        <h3>Upload image file</h3>
        <form action="\site\imageupload" method="post" enctype="multipart/form-data" id="MyUploadForm">
            <input name="FileInput" id="FileInput" type="file"/>
            <input type="submit" id="submit-btn" value="Upload"/>
            <img src="images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
        </form>
        <div id="progressbox">
            <div id="progressbar"></div>
            <div id="statustxt">0%</div>
        </div>
        <div id="output"></div>
    </div>
</div>