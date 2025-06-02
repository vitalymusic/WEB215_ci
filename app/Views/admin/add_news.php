<?= $this->extend('admin/admin_layout') ?>

<?= $this->section('content') ?>
    <!-- Quill CSS/JS -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <div class="container">
        <h1>Add news</h1>
        <form action="<?= base_url('news/add') ?>" method="post" id="newsForm">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">News name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="news_name">
            </div>
            <div class="mb-3">
                <label for="editor" class="form-label">News content</label>
                <!-- Toolbar for Quill (optional, customizable) -->
                <div id="toolbar">
                    <span class="ql-formats">
                        <select class="ql-font"></select>
                        <select class="ql-size"></select>
                    </span>
                    <span class="ql-formats">
                        <button class="ql-bold"></button>
                        <button class="ql-italic"></button>
                        <button class="ql-underline"></button>
                        <button class="ql-strike"></button>
                    </span>
                    <span class="ql-formats">
                        <select class="ql-color"></select>
                        <select class="ql-background"></select>
                    </span>
                    <span class="ql-formats">
                        <button class="ql-script" value="sub"></button>
                        <button class="ql-script" value="super"></button>
                    </span>
                    <span class="ql-formats">
                        <button class="ql-header" value="1"></button>
                        <button class="ql-header" value="2"></button>
                        <button class="ql-blockquote"></button>
                        <button class="ql-code-block"></button>
                    </span>
                    <span class="ql-formats">
                        <button class="ql-list" value="ordered"></button>
                        <button class="ql-list" value="bullet"></button>
                        <button class="ql-indent" value="-1"></button>
                        <button class="ql-indent" value="+1"></button>
                    </span>
                    <span class="ql-formats">
                        <button class="ql-direction" value="rtl"></button>
                        <select class="ql-align"></select>
                    </span>
                    <span class="ql-formats">
                        <button class="ql-link"></button>
                        <button class="ql-image"></button>
                        <button class="ql-video"></button>
                        <button class="ql-formula"></button>
                    </span>
                    <span class="ql-formats">
                        <button class="ql-clean"></button>
                    </span>
                </div>
                <!-- Quill editor -->
                <div id="editor" style="height: 200px;"></div>
                <!-- Hidden input for form submit -->
                <input type="hidden" name="news_content" id="news_content">
            </div>
            <button type="submit" class="btn btn-primary">Add News</button>
        </form>
    </div>

    <script>
        // Initialize Quill editor
        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: '#toolbar'
            }
        });

        // On form submit, copy HTML from Quill to hidden input
        document.getElementById('newsForm').onsubmit = function() {
            document.getElementById('news_content').value = quill.root.innerHTML;
        };
    </script>

<?= $this->endSection() ?>
