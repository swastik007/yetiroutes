<?php
$pageTitle = 'Media Library';
ob_start();
?>

<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Media Library</h2>
        <p class="text-gray-600">Manage images and files</p>
    </div>
    <button onclick="showUploadModal()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        <i class="fas fa-upload mr-2"></i>Upload Media
    </button>
</div>

<!-- Stats -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Files</p>
                <p class="text-3xl font-bold text-gray-900"><?= count($media ?? []) ?></p>
            </div>
            <div class="bg-blue-100 rounded-full p-3">
                <i class="fas fa-images text-blue-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Images</p>
                <p class="text-3xl font-bold text-gray-900">
                    <?= count(array_filter($media ?? [], fn($m) => str_starts_with($m->mime_type ?? '', 'image/'))) ?>
                </p>
            </div>
            <div class="bg-green-100 rounded-full p-3">
                <i class="fas fa-image text-green-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Documents</p>
                <p class="text-3xl font-bold text-gray-900">
                    <?= count(array_filter($media ?? [], fn($m) => str_starts_with($m->mime_type ?? '', 'application/'))) ?>
                </p>
            </div>
            <div class="bg-purple-100 rounded-full p-3">
                <i class="fas fa-file-alt text-purple-600 text-2xl"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm">Total Size</p>
                <p class="text-2xl font-bold text-gray-900">
                    <?php
                    $totalSize = array_sum(array_map(fn($m) => $m->file_size ?? 0, $media ?? []));
                    echo $totalSize > 1024*1024 ? round($totalSize/1024/1024, 1) . ' MB' : round($totalSize/1024, 1) . ' KB';
                    ?>
                </p>
            </div>
            <div class="bg-orange-100 rounded-full p-3">
                <i class="fas fa-database text-orange-600 text-2xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Media Grid -->
<div class="bg-white rounded-lg shadow p-6">
    <?php if (!empty($media)): ?>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <?php foreach ($media as $item): ?>
                <div class="group relative border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                    <!-- Image Preview -->
                    <div class="aspect-square bg-gray-100 flex items-center justify-center">
                        <?php if (str_starts_with($item->mime_type ?? '', 'image/')): ?>
                            <img src="<?= htmlspecialchars($item->file_path ?? '') ?>"
                                 alt="<?= htmlspecialchars($item->original_filename ?? '') ?>"
                                 class="w-full h-full object-cover">
                        <?php else: ?>
                            <div class="text-center p-4">
                                <i class="fas fa-file text-4xl text-gray-400 mb-2"></i>
                                <p class="text-xs text-gray-600"><?= strtoupper(pathinfo($item->original_filename ?? '', PATHINFO_EXTENSION)) ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Overlay Actions -->
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition flex items-center justify-center opacity-0 group-hover:opacity-100">
                        <div class="flex space-x-2">
                            <button onclick="viewMedia(<?= $item->id ?>)"
                                    class="bg-white text-gray-800 px-3 py-2 rounded hover:bg-gray-100" title="View">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button onclick="copyUrl('<?= htmlspecialchars($item->file_path ?? '') ?>')"
                                    class="bg-white text-gray-800 px-3 py-2 rounded hover:bg-gray-100" title="Copy URL">
                                <i class="fas fa-link"></i>
                            </button>
                            <button onclick="deleteMedia(<?= $item->id ?>)"
                                    class="bg-red-600 text-white px-3 py-2 rounded hover:bg-red-700" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Info Footer -->
                    <div class="p-2 bg-white border-t">
                        <p class="text-xs text-gray-700 truncate" title="<?= htmlspecialchars($item->original_filename ?? '') ?>">
                            <?= htmlspecialchars($item->original_filename ?? 'Unknown') ?>
                        </p>
                        <p class="text-xs text-gray-500">
                            <?php
                            $size = $item->file_size ?? 0;
                            echo $size > 1024*1024 ? round($size/1024/1024, 1) . ' MB' : round($size/1024, 1) . ' KB';
                            ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="text-center py-12">
            <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">No Media Yet</h3>
            <p class="text-gray-500 mb-6">Upload your first image or file to get started</p>
            <button onclick="showUploadModal()" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                <i class="fas fa-upload mr-2"></i>Upload Now
            </button>
        </div>
    <?php endif; ?>
</div>

<!-- Upload Modal -->
<div id="uploadModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full mx-4">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-900">Upload Media</h3>
                <button onclick="closeUploadModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <div id="dropzone" class="border-2 border-dashed border-gray-300 rounded-lg p-12 text-center hover:border-blue-500 transition cursor-pointer">
                <i class="fas fa-cloud-upload-alt text-6xl text-gray-400 mb-4"></i>
                <p class="text-lg text-gray-700 mb-2">Drag & drop files here</p>
                <p class="text-sm text-gray-500 mb-4">or click to browse</p>
                <input type="file" id="fileInput" multiple accept="image/*,application/pdf" class="hidden">
                <button type="button" onclick="document.getElementById('fileInput').click()"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Select Files
                </button>
                <p class="text-xs text-gray-500 mt-4">Supported: JPG, PNG, GIF, PDF (Max 5MB each)</p>
            </div>

            <div id="uploadProgress" class="hidden mt-6">
                <div class="space-y-2">
                    <div class="flex justify-between text-sm text-gray-700">
                        <span id="progressText">Uploading...</span>
                        <span id="progressPercent">0%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div id="progressBar" class="bg-blue-600 h-2 rounded-full transition-all" style="width: 0%"></div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button onclick="closeUploadModal()" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function showUploadModal() {
    document.getElementById('uploadModal').classList.remove('hidden');
}

function closeUploadModal() {
    document.getElementById('uploadModal').classList.add('hidden');
    document.getElementById('uploadProgress').classList.add('hidden');
}

function viewMedia(id) {
    // TODO: Implement media viewer
    alert('View media ID: ' + id);
}

function copyUrl(url) {
    navigator.clipboard.writeText(window.location.origin + url).then(() => {
        alert('URL copied to clipboard!');
    });
}

function deleteMedia(id) {
    if (confirm('Are you sure you want to delete this media file?')) {
        // TODO: Implement delete via AJAX
        alert('Delete functionality coming soon! ID: ' + id);
    }
}

// File upload handling
document.getElementById('fileInput')?.addEventListener('change', function(e) {
    const files = e.target.files;
    if (files.length > 0) {
        uploadFiles(files);
    }
});

function uploadFiles(files) {
    const formData = new FormData();
    for (let file of files) {
        formData.append('files[]', file);
    }

    const progressDiv = document.getElementById('uploadProgress');
    const progressBar = document.getElementById('progressBar');
    const progressText = document.getElementById('progressText');
    const progressPercent = document.getElementById('progressPercent');

    progressDiv.classList.remove('hidden');
    progressText.textContent = 'Uploading...';

    // Upload via AJAX
    const xhr = new XMLHttpRequest();

    // Progress tracking
    xhr.upload.addEventListener('progress', (e) => {
        if (e.lengthComputable) {
            const percentComplete = (e.loaded / e.total) * 100;
            progressBar.style.width = percentComplete + '%';
            progressPercent.textContent = Math.round(percentComplete) + '%';
        }
    });

    // Upload complete
    xhr.addEventListener('load', () => {
        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            console.log('Upload response:', response); // Debug log

            if (response.success) {
                progressText.textContent = response.message;
                progressBar.classList.add('bg-green-600');
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                // Show detailed error message
                let errorMsg = 'Upload failed: ' + response.message;
                if (response.errors && response.errors.length > 0) {
                    errorMsg += '\nErrors: ' + response.errors.join(', ');
                }
                if (response.debug) {
                    console.error('Debug info:', response.debug);
                    errorMsg += ' (check console for details)';
                }
                progressText.textContent = errorMsg;
                progressBar.classList.add('bg-red-600');
            }
        } else {
            progressText.textContent = 'Upload failed (HTTP ' + xhr.status + ')';
            progressBar.classList.add('bg-red-600');
        }
    });

    // Error handling
    xhr.addEventListener('error', () => {
        progressText.textContent = 'Upload error occurred';
        progressBar.classList.add('bg-red-600');
    });

    // Send request
    xhr.open('POST', '/admin/media/upload', true);
    xhr.send(formData);
}

// Drag and drop
const dropzone = document.getElementById('dropzone');
dropzone?.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropzone.classList.add('border-blue-500', 'bg-blue-50');
});

dropzone?.addEventListener('dragleave', () => {
    dropzone.classList.remove('border-blue-500', 'bg-blue-50');
});

dropzone?.addEventListener('drop', (e) => {
    e.preventDefault();
    dropzone.classList.remove('border-blue-500', 'bg-blue-50');
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        uploadFiles(files);
    }
});
</script>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../../layouts/admin.php';
?>
