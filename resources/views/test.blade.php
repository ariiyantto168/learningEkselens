<?php
if (!empty($request->idannounceattachments)) {
            foreach ($request->idannounceattachments as $key => $fileattach) {
                if ($fileattach == 'new') {
                    $saveAttach = new AnnounceAttachments;
                    $saveAttach->idannouncements = $newAnnounce->idannouncements;
                    $filename = null;
                    if (!empty($request->file('files')[$key])) {
                        $filename = generate_random_string(20).'.'.$request->file('files')[$key]->getClientOriginalExtension();
                        $cdnpath = env('CDN_PATH').'acis/announcements/';
                        $request->file('files')[$key]->move($cdnpath, $filename);
                    }
                    $saveAttach->attachment = $filename;
                } else {
                    $saveAttach = AnnounceAttachments::find($fileattach);
                    if (is_null($saveAttach->attachment)) {
                        if (!empty($request->file('files')[$key])) {
                            $filename = generate_random_string(20).'.'.$request->file('files')[$key]->getClientOriginalExtension();
                            $cdnpath = env('CDN_PATH').'acis/announcements/';
                            $request->file('files')[$key]->move($cdnpath, $filename);
                            $saveAttach->attachment = $filename;
                        }
                    } elseif (!is_null($saveAttach->attachment)) {
                        $img_exists = env('CDN_PATH').'acis/announcements/'.$saveAttach->attachment;
                        if (!empty($request->file('files')[$key])) {
                            if (File::exists($img_exists)) {
                                $filename = generate_random_string(20).'.'.$request->file('files')[$key]->getClientOriginalExtension();
                                $cdnpath = env('CDN_PATH').'acis/announcements/';
                                $request->file('files')[$key]->move($cdnpath, $filename);
                                $saveAttach->attachment = $filename;
                            }
                            // delete pdf old
                            File::delete($img_exists);
                        }
                    }
                }
                $saveAttach->caption = $request->caption[$key];
                if ($request->active_attach) {
                    $saveAttach->active = true;
                }else{
                    $saveAttach->active = false;
                }
                $saveAttach->save();
            }

            //delete announceattachment
            if (strlen($request->deleteindex) > 0) {
                $this->delete_announcement_attach($request->deleteindex);
            }
        }