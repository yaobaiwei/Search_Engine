SET(PACKAGE_VERSION 1.2.8)
IF (PACKAGE_FIND_VERSION VERSION_EQUAL PACKAGE_VERSION)
  SET(PACKAGE_VERSION_EXACT "true")
ENDIF (PACKAGE_FIND_VERSION VERSION_EQUAL PACKAGE_VERSION)
IF (NOT PACKAGE_FIND_VERSION VERSION_GREATER PACKAGE_VERSION)
  SET(PACKAGE_VERSION_COMPATIBLE "true")
ELSE (NOT PACKAGE_FIND_VERSION VERSION_GREATER PACKAGE_VERSION)
  SET(PACKAGE_VERSION_UNSUITABLE "true")
ENDIF (NOT PACKAGE_FIND_VERSION VERSION_GREATER PACKAGE_VERSION)
IF (PACKAGE_VERSION_UNSUITABLE)
  MESSAGE("VERSION CHECK FAILED FOR ${PACKAGE_FIND_NAME}. WANTED ${PACKAGE_FIND_VERSION}, HAVE ${PACKAGE_VERSION}")
ENDIF(PACKAGE_VERSION_UNSUITABLE)
