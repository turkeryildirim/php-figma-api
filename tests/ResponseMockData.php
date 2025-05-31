<?php

declare(strict_types=1);

namespace Turker\FigmaAPI\Tests;

class ResponseMockData
{
    public const FILE_IMAGE_FILLS     = '{
    "meta": {
        "images": [
            {"node_id1": "image_url1"},
            {"node_id2": "image_url2"}
        ]
    }
}';
    public const FILE_IMAGES          = '{
    "images": [
        {"node_id1": "image_url1"},
        {"node_id2": "image_url2"}
    ]
}';
    public const FILE_NODES           = '{
    "name": "name",
    "thumbnailUrl": "thumbnail_url",
    "lastModified": "last_modified",
    "role": "role",
    "version": "version",
    "nodes": {
       "1105:2": {
            "document": {
                "id": "id",
                "name": "name",
                "type": "type",
                "scrollBehavior": "scrollBehavior"
            },
            "components": {
                "1105:2": {
                    "componentSetId": "componentSetId",
                    "key": "key",
                    "name": "name",
                    "description": "description",
                    "remote": false,
                    "documentationLinks": [{"url":"url"}]
                }
            },
            "componentSets": {
                "1105:2": {
                    "key": "key",
                    "name": "name",
                    "description": "description",
                    "remote": false,
                    "documentationLinks": [{"url":"url"}]
                }
            },
            "styles": {
                "1105:2": {
                    "style_type": "GRID",
                    "key": "key",
                    "name": "name",
                    "description": "description",
                    "remote": false
                }
            }
        }
    }
}';
    public const FILE                 = '{
    "name": "name",
    "thumbnail_url": "thumbnail_url",
    "last_modified": "last_modified",
    "role": "role",
    "version": "version",
    "mainFileKey": "mainFileKey",
    "document": {
        "id": "0:0",
        "name": "Document",
        "type": "DOCUMENT",
        "scrollBehavior": "SCROLLS"
    },
    "components": [
        {
            "componentSetId": "componentSetId",
            "key": "key",
            "name": "name",
            "description": "description",
            "remote": false,
            "documentationLinks": [{"url":"url"}]
        }
    ],
    "componentSets": [
        {
            "key": "key",
            "name": "name",
            "description": "description",
            "remote": false,
            "documentationLinks": [{"url":"url"}]
        }
    ],
    "styles": [
        {
            "styleType": "GRID",
            "key": "key",
            "name": "name",
            "description": "description",
            "remote": false
        }
    ]
}';
    public const FILE_META            = '{
      "status": 200,
      "error": false,
      "file": {
        "name": "name",
        "thumbnail_url": "thumbnail_url",
        "role": "role",
        "last_touched_at": "last_touched_at",
        "folder_name": "folder_name",
        "version": "version",
        "link_access": "link_access",
        "url": "url",
        "creator": {
          "id": "id",
          "handle": "handle",
          "img_url": "img_url"
        },
        "last_touched_by": {
          "id": "id",
          "handle": "handle",
          "img_url": "img_url"
        }
      }
    }';
    public const USER                 = '{"id": "id","email": "email","handle": "handle","img_url": "img_url"}';
    public const VERSION_HISTORY_NULL = '{"versions": {},"pagination": {}}';
    public const VERSION_HISTORY      = '{
      "versions": [
        {
          "id": "id",
          "created_at": "created_at",
          "label": "label",
          "user": {
            "id": "id",
            "handle": "handle",
            "img_url": "img_url"
          }
        }
      ],
      "pagination": {
        "next_page": "next_page"
      }
    }';
    public const TEAM_STYLE           = '{
      "error": false,
      "status": 200,
      "meta": {
        "cursor": {
            "before": "before",
            "after": "after"
        },
        "styles": [
          {
            "key": "key",
            "file_key": "file_key",
            "node_id": "node_id",
            "style_type": "FILL",
            "thumbnail_url": "thumbnail_url",
            "name": "name",
            "description": "",
            "created_at": "created_at",
            "updated_at": "updated_at",
            "user": {
              "id": "id",
              "handle": "handle",
              "img_url": "img_url"
            },
            "sort_position": "sort_position"
          }
        ]
      },
      "i18n": null
    }';
    public const FILE_STYLE           = '{
      "error": false,
      "status": 200,
      "meta": {
        "styles": [
          {
            "key": "key",
            "file_key": "file_key",
            "node_id": "node_id",
            "style_type": "FILL",
            "thumbnail_url": "thumbnail_url",
            "name": "name",
            "description": "",
            "created_at": "created_at",
            "updated_at": "updated_at",
            "user": {
              "id": "id",
              "handle": "handle",
              "img_url": "img_url"
            },
            "sort_position": "sort_position"
          }
        ]
      },
      "i18n": null
    }';
    public const STYLE                = '{
      "error": false,
      "status": 200,
      "meta": {
        "key": "key",
        "file_key": "file_key",
        "node_id": "node_id",
        "style_type": "FILL",
        "thumbnail_url": "thumbnail_url",
        "name": "name",
        "description": "",
        "created_at": "created_at",
        "updated_at": "updated_at",
        "user": {
          "id": "id",
          "handle": "handle",
          "img_url": "img_url"
        },
        "sort_position": "sort_position"
      }
    }';
    public const PROJECT              = '{
        "name": "name",
        "projects": [
            {
                "id": "123456789",
                "name": "Team project"
            }
        ]
    }';
    public const PROJECT_FILES        = '{
        "name": "Team project",
        "files": [
            {
                "key": "key",
                "name": "API TEST",
                "thumbnail_url": "thumbnail_url",
                "last_modified": "last_modified"
            },
            {
                "key": "key2",
                "name": "library",
                "thumbnail_url": "thumbnail_url2",
                "last_modified": "last_modified2"
            }
        ]
    }';
    public const TEAM_COMPONENT_SET   = '{
      "status": 200,
      "error": false,
      "meta": {
        "component_sets": [
          {
            "key": "key",
            "file_key": "file_key",
            "node_id": "node_id",
            "name": "name",
            "description": "description",
            "created_at": "created_at",
            "updated_at": "updated_at",
            "user": {
              "id": "id",
              "handle": "handle",
              "img_url": "img_url"
            },
            "thumbnail_url": "thumbnail_url",
            "containing_frame": {
              "pageId": "pageId",
              "pageName": "pageName",
              "nodeId": "nodeId",
              "name": "name",
              "backgroundColor": {
                "r": 0,
                "g": 0,
                "b": 0,
                "a": 0
              },
              "containingComponentSet": "containingComponentSet"
            }
          }
        ],
        "cursor": {
          "before": 43410457.04840246,
          "after": 1752485.0628680736
        }
      }
    }';
    public const FILE_COMPONENT_SET   = '{
      "status": 200,
      "error": false,
      "meta": {
        "component_sets": [
          {
            "key": "key",
            "file_key": "file_key",
            "node_id": "node_id",
            "name": "name",
            "description": "description",
            "created_at": "created_at",
            "updated_at": "updated_at",
            "user": {
              "id": "id",
              "handle": "handle",
              "img_url": "img_url"
            },
            "thumbnail_url": "thumbnail_url",
            "containing_frame": {
              "pageId": "pageId",
              "pageName": "pageName",
              "nodeId": "nodeId",
              "name": "name",
              "backgroundColor": {
                "r": 0,
                "g": 0,
                "b": 0,
                "a": 0
              },
              "containingComponentSet": "containingComponentSet"
            }
          }
        ]
      }
    }';
    public const COMPONENT_SET        = '{
      "status": 200,
      "error": false,
      "meta": {
        "key": "key",
        "file_key": "file_key",
        "node_id": "node_id",
        "name": "name",
        "description": "description",
        "created_at": "created_at",
        "updated_at": "updated_at",
        "user": {
          "id": "id",
          "handle": "handle",
          "img_url": "img_url"
        },
        "thumbnail_url": "thumbnail_url",
        "containing_frame": {
          "pageId": "pageId",
          "pageName": "pageName",
          "nodeId": "nodeId",
          "name": "name",
          "backgroundColor": {
            "r": 0,
            "g": 0,
            "b": 0,
            "a": 0
          },
          "containingComponentSet": "containingComponentSet"
        }
      }
    }';
    public const TEAM_COMPONENT       = '{
      "status": 200,
      "error": false,
      "meta": {
        "components": [
          {
            "key": "key",
            "file_key": "file_key",
            "node_id": "node_id",
            "name": "name",
            "description": "description",
            "created_at": "created_at",
            "updated_at": "updated_at",
            "user": {
              "id": "id",
              "handle": "handle",
              "img_url": "img_url"
            },
            "thumbnail_url": "thumbnail_url",
            "containing_frame": {
              "pageId": "pageId",
              "pageName": "pageName",
              "nodeId": "nodeId",
              "name": "name",
              "backgroundColor": {
                "r": 0,
                "g": 0,
                "b": 0,
                "a": 0
              },
              "containingComponentSet": "containingComponentSet"
            }
          }
        ],
        "cursor": {
          "before": 43410457.04840246,
          "after": 1752485.0628680736
        }
      }
    }';
    public const FILE_COMPONENT       = '{
      "status": 200,
      "error": false,
      "meta": {
        "components": [
          {
            "key": "key",
            "file_key": "file_key",
            "node_id": "node_id",
            "name": "name",
            "description": "description",
            "created_at": "created_at",
            "updated_at": "updated_at",
            "user": {
              "id": "id",
              "handle": "handle",
              "img_url": "img_url"
            },
            "thumbnail_url": "thumbnail_url",
            "containing_frame": {
              "pageId": "pageId",
              "pageName": "pageName",
              "nodeId": "nodeId",
              "name": "name",
              "backgroundColor": {
                "r": 0,
                "g": 0,
                "b": 0,
                "a": 0
              },
              "containingComponentSet": "containingComponentSet"
            }
          }
        ]
      }
    }';
    public const COMPONENT            = '{
      "status": 200,
      "error": false,
      "meta": {
        "key": "key",
        "file_key": "file_key",
        "node_id": "node_id",
        "name": "name",
        "description": "description",
        "created_at": "created_at",
        "updated_at": "updated_at",
        "user": {
          "id": "id",
          "handle": "handle",
          "img_url": "img_url"
        },
        "thumbnail_url": "thumbnail_url",
        "containing_frame": {
          "pageId": "pageId",
          "pageName": "pageName",
          "nodeId": "nodeId",
          "name": "name",
          "backgroundColor": {
            "r": 0,
            "g": 0,
            "b": 0,
            "a": 0
          },
          "containingComponentSet": "containingComponentSet"
        }
      }
    }';
    public const GET_COMMENTS         = '{
      "comments": [
        {
          "id": "id",
          "client_meta": {
            "x": 0,
            "y": 0
          },
          "file_key": "file_key",
          "user": {
            "id": "id",
            "handle": "handle",
            "img_url": "img_url"
          },
          "created_at": "created_at",
          "message": "message",
          "reactions": [],
          "order_id": "1",
          "parent_id": "parent_id",
          "resolved_at": "resolved_at"
        },
        {
          "id": "id",
          "client_meta": {
            "node_id": "0:1",
            "node_offset": {
              "x": -316,
              "y": -366
            },
            "stable_path": [
              "0:1"
            ]
          },
          "file_key": "file_key",
          "user": {
            "id": "id",
            "handle": "handle",
            "img_url": "img_url"
          },
          "created_at": "created_at",
          "message": "message",
          "reactions": [],
          "order_id": "2",
          "parent_id": "parent_id",
          "resolved_at": "resolved_at"
        }
      ]
    }';
    public const POST_COMMENT         = '{
        "id": "id",
        "uuid": null,
        "file_key": "file_key",
        "parent_id": "parent_id",
        "user": {
            "handle": "handle",
            "img_url": "img_url",
            "id": "id"
        },
        "created_at": "created_at",
        "resolved_at": "resolved_at",
        "message": "message",
        "reactions": [],
          "client_meta": {
            "node_id": "0:1",
            "node_offset": {
              "x": -316,
              "y": -366
            },
            "stable_path": [
              "0:1"
            ]
          },
        "order_id": "2"
    }';
    public const DELETE_COMMENT       = '{
        "error": false,
        "status": 200,
        "i18n": null
    }';
    public const GET_REACTION         = '{
        "reactions": [
            {
                "emoji": ":heart:",
                "created_at": "created_at",
                "user": {
                    "id": "id",
                    "handle": "handle",
                    "img_url": "img_url"
                }
            }
        ],
        "pagination": {}
    }';
    public const DELETE_REACTION      = '{
        "error": false,
        "status": 200,
        "i18n": null
    }';
    public const POST_REACTION        = '{
        "error": false,
        "status": 200,
        "i18n": null
    }';
}
