<style>
    .sp-upload-box {
        width: 100%;
        border: 2px dashed #ccc;
        min-height: 300px;
        position: relative;
        overflow-y: auto;
        padding-bottom: 5px;
    }
    .sp-upload-button {
        width: 100%;
        text-align: center;
        line-height: 300px;
    }
    .sp-upload-button span.middle {
        display: inline-block;
        vertical-align: middle;
        line-height: normal;
    }
    .sp-upload-button #inputImage input {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 300px;
        padding: 0;
        margin: 0;
        cursor: pointer;
        opacity: 0;
    }
    .sp-upload-button2 {
        width: 175px;
        height: 120px;
        text-align: center;
        line-height: 50px;
        border: 2px dashed #ccc;
        float: left;
        margin-left: 10px;
        margin-top: 10px;
        line-height: 60px;
    }
    .sp-upload-button2 #inputImage input {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 175px;
        height: 120px;
        padding: 0;
        margin: 0;
        cursor: pointer;
        opacity: 0;
    }
    .sp-upload-button2 span.middle {
        position: relative;
    }
    .sp-upload-button .badge,
    .sp-upload-button2 .badge {
        margin-bottom: 8px;
        padding: 10px 10px;
        border-radius: 16px;
    }

    .sp-upload-show {
        margin: 0;
        padding: 0;
        float: left;
    }
    .sp-upload-show input {
        display: none;
    }
    .sp-upload-show li {
        padding: 0;
        list-style: none;
        float: left;
        padding: 10px;
    }
    .sp-upload-show li .badge {
        position: absolute;
        cursor: pointer;
        top: 1px;
        left: 1px;
    }
    .sp-upload-show li.box {
        width: 120px;
        height: 120px;
        display: flex;
        overflow: hidden;
        flex-direction: column;
        justify-content: center;
        border: .1rem solid #dfe3e8;
        background: #f4f6f8;
        border-radius: 6px;
        margin: 5px;
        padding: 5px;
        position: relative;
        z-index: 11;
    }
    .sp-upload-show li.box.width-big {
        width: 200px;
        height: 200px;
    }

    .sp-upload-show li.box:hover {
        background: linear-gradient(180deg,rgba(33,43,54,.55),hsla(0,0%,100%,0));
    }
    .sp-upload-show li.box img {
        width: 100%;
    }
</style>