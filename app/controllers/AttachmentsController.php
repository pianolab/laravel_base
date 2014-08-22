<?php

class AttachmentsController extends \BaseController
{
    public function create()
    {
        $this->setLayout('layouts.blank');

        if (Input::hasFile('Filedata')) {
            $file = Input::file('Filedata');

            $folder = Input::get('parent_name');

            $attachment = new Attachment();
            $attachment->parent_id = Input::get('parent_id');
            $attachment->parent_name = str_singular( $folder );
            $attachment->origin_name = $file->getClientOriginalName();
            $attachment->type = $file->getMimeType();
            $attachment->size = $file->getSize();

            $destination_path = public_path() . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $attachment->parent_id;
            $attachment->file_name = $attachment->unique_name() . '.' . $file->getClientOriginalExtension();

            $is_upload = $file->move($destination_path, $attachment->file_name);

            if ($is_upload) {
                $attachment->save();
                $this->layout->content = View::make('attachments.create')->with('attachment', $attachment);
            }
            else {
                return App::abort(401);
            }
        }
        else {
            return App::abort(401);
        }
    }


    public function update($parent, $parent_id, $id)
    {
        $input = Input::all();
        $attachment = Attachment::where('parent_name', str_singular($parent))->where('parent_id', $parent_id)->find($id);

        if ($attachment->update($input)) {
            return [ 'success' => true, 'attachment_is_main' => $attachment->is_main ];
        }
        else {
            return App::abort(401);
        } # endif;
    }


    public function destroy($parent, $parent_id, $id)
    {
        $attachment = Attachment::where('parent_name', str_singular($parent))->where('parent_id', $parent_id)->find($id);

        if ($attachment->delete()) {
            return [ 'success' => true, 'message' => t('File was successfully removed') ];
        }
        else {
            return App::abort(401);
        } # endif;
    }
}
