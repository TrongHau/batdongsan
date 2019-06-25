<?php

namespace Backpack\CRUD\app\Http\Controllers\Operations;
use App\Library\Helpers;
use Storage;

trait DeleteOperation
{
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return string
     */
    public function destroy($id)
    {
        $this->crud->hasAccessOrFail('delete');
        $this->crud->setOperation('delete');

        // get entry ID from Request (makes sure its the last ID for nested resources)
        $id = $this->crud->getCurrentEntryId() ?? $id;

        if ($entry = $this->crud->model->find($id)) {
            if($entry->gallery_image) {
                if($entry->getTable() == 'articles_for_lease') {
                    foreach (json_decode($entry->gallery_image) as $item) {
                        Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_ARTICLE_LEASE, true) . $item);
                        Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_ARTICLE_LEASE, true) . THUMBNAIL_PATH . $item);
                    }
                }elseif($entry->getTable() == 'articles_for_buy') {
                    foreach (json_decode($entry->gallery_image) as $item) {
                        Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_ARTICLE_BUY, true) . $item);
                        Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_ARTICLE_BUY, true) . THUMBNAIL_PATH . $item);
                    }
                }elseif($entry->getTable() == 'articles_for_lease_sync') {
                    foreach (json_decode($entry->gallery_image) as $item) {
                        Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_SYNC_ARTICLE_LEASE, true) . $item);
                        Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_SYNC_ARTICLE_LEASE, true) . THUMBNAIL_PATH . $item);
                    }
                }elseif($entry->getTable() == 'articles_for_buy_sync') {
                    foreach (json_decode($entry->gallery_image) as $item) {
                        Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_SYNC_ARTICLE_BUY, true) . $item);
                        Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_SYNC_ARTICLE_BUY, true) . THUMBNAIL_PATH . $item);
                    }
                }
            }
            if($entry->getTable() == 'articles_sync') {
                Storage::disk('public_local')->delete($entry->image);
                preg_match_all('@src="(.*?)"@si', $entry->content, $data_img);
                if(isset($data_img[1])) {
                    foreach ($data_img[1] as $item) {
                        Storage::disk('public_local')->delete($item);
                    }
                }
            }
            $deletedEntries[] = $entry->delete();
        }

        return $this->crud->delete($id);
    }

    /**
     * Delete multiple entries in one go.
     *
     * @return string
     */
    public function bulkDelete()
    {
        $this->crud->hasAccessOrFail('delete');
        $this->crud->setOperation('delete');

        $entries = $this->request->input('entries');
        $deletedEntries = [];
        foreach ($entries as $key => $id) {
            if ($entry = $this->crud->model->find($id)) {
                if($entry->gallery_image) {
                    if($entry->getTable() == 'articles_for_lease') {
                        foreach (json_decode($entry->gallery_image) as $item) {
                            Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_ARTICLE_LEASE, true) . $item);
                            Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_ARTICLE_LEASE, true) . THUMBNAIL_PATH . $item);
                        }
                    }elseif($entry->getTable() == 'articles_for_buy') {
                        foreach (json_decode($entry->gallery_image) as $item) {
                            Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_ARTICLE_BUY, true) . $item);
                            Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_ARTICLE_BUY, true) . THUMBNAIL_PATH . $item);
                        }
                    }elseif($entry->getTable() == 'articles_for_lease_sync') {
                        foreach (json_decode($entry->gallery_image) as $item) {
                            Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_SYNC_ARTICLE_LEASE, true) . $item);
                            Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_SYNC_ARTICLE_LEASE, true) . THUMBNAIL_PATH . $item);
                        }
                    }elseif($entry->getTable() == 'articles_for_buy_sync') {
                        foreach (json_decode($entry->gallery_image) as $item) {
                            Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_SYNC_ARTICLE_BUY, true) . $item);
                            Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_SYNC_ARTICLE_BUY, true) . THUMBNAIL_PATH . $item);
                        }
                    }
                }
                if($entry->getTable() == 'articles_sync') {
                    Storage::disk('public_local')->delete($entry->image);
                    preg_match_all('@src="(.*?)"@si', $entry->content, $data_img);
                    if(isset($data_img[1])) {
                        foreach ($data_img[1] as $item) {
                            Storage::disk('public_local')->delete($item);
                        }
                    }
                }
                $deletedEntries[] = $entry->delete();
            }
        }

        return $deletedEntries;
    }
}
